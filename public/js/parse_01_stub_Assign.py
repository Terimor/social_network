# Таблиця лексем мови
tableOfLanguageTokens = {'program':'keyword','var':'keyword', 'begin':'keyword', 'while':'keyword',\
                         'end':'keyword', 'int':'keyword', 'real':'keyword', \
                         'bool':'keyword','read':'keyword', 'write':'keyword', 'while':'keyword', \
                         'do':'keyword', 'if':'keyword', '?':'punct',\
                          '=':'assign_op', '.':'dot','.':'punct',',':'punct', ';':'punct', ':':'punct',\
                         ' ':'ws', '\t':'ws', '\n':'eol','\r\n':'eol','\0':'eol', '-':'add_op',\
                         '+':'add_op', '*':'mult_op', '/':'mult_op','div':'mult_op','^':'mult_op', '<':'rel_op', '<=':'rel_op', '>':'rel_op',\
                         '>=':'rel_op','==':'rel_op', '<>':'rel_op', '(':'brackets_op', ')':'brackets_op', 'true':'bool', 'false':'bool'}
# Решту токенів визначаємо не за лексемою, а за заключним станом
tableIdentFloatInt = {2:'id', 6:'real', 9:'int'}

# Діаграма станів
#               Q                                                    q0          F
# M = ({0,1,2,4,5,6,9,11,12,13,14,15,16,17,18,19,20,21,101if a  > b ? a = 3 : b = 3,102}, Σ,  δ , 0 , {2,6,9,12,13,15,16,17,19,20,21,101,102})

# δ - state-transition_function
stf={(0,'Letter'):1,(0,'e'):1, (1,'Letter'):1, (1,'e'):1, (1,'Digit'):1, (1,'other'):2,\
     (0,'Digit'):4, (4,'Digit'):4, (4,'e'):7, (4,'dot'):5, (4,'other'):9, (5,'Digit'):5, (5, 'e'):7, (7, '-'):5, (7, 'Digit'):5, (5,'other'):6, \
     (0, '='):11,\
     (0, 'ws'):0, (0, ','):13,\
     (0, 'eol'):21, \
     (0, '+'):13,(0, '-'):13, (0, 'mult_op'):13,  (0, '('):13, (0, ')'):13, (0, 'div'):13, (0, '^'):13, (0, '='):14, (14, '='):13, (0, ':'):13, (0, '?'):13,\
     (0,'<'):14, (14,'other'):15, (14,'='):16, (14,'>'):17,\
     (0,'>'):18, (18,'other'):19, (18,'='):20,\
     (0,'true'):22,(0,'false'):22,\
     (0, 'other'):101
}


initState = 0   # q0 - стартовий стан
F={2,6,9,11,13,15,16,17,19,20,21,22,101}
Fstar={2,6,9,15,19}   # зірочка
Ferror={101}# обробка помилок


tableOfVar={}   # Таблиця ідентифікаторів
tableOfConst={} # Таблиць констант
tableOfSymb={}  # Таблиця символів програми (таблиця розбору)


state=initState # поточний стан

f = open('test1.my_lang', 'r')
sourceCode=f.read()
f.close()


lenCode=len(sourceCode)       # номер останнього символа у файлі з кодом програми
numLine=1                       # лексичний аналіз починаємо з першого рядка
numChar=-1                      # і з першого символа (в Python'і нумерація - з 0)
char=''                         # ще не брали жодного символа
lexeme=''                       # ще не розпізнавали лексем


def lex():
	global state,numLine,char,lexeme,numChar
	while numChar<lenCode-1:
		char=nextChar()
		classCh=classOfChar(char)
		state=nextState(state,classCh)
		if (is_final(state)): 
			processing()
			if state in Ferror:
				break
		elif state==0:lexeme=''
		else: lexeme+=char

def processing():
	global state,lexeme,char,numLine,numChar, tableOfSymb
	if state==21:		# eol
		numLine+=1
		state=0
	if state in (2,6,9,15,19):	# keyword, ident, float, int, <, >
		token=getToken(state,lexeme) 
		if token!='keyword': # не keyword
			index=indexVarConst(state,lexeme)
			print('{0:<3d} {1:<10s} {2:<10s} {3:<2d} '.format(numLine,lexeme,token,index))
			tableOfSymb[len(tableOfSymb)+1] = (numLine,lexeme,token,index)
		else: # якщо keyword
			print('{0:<3d} {1:<10s} {2:<10s} '.format(numLine,lexeme,token)) #print(numLine,lexeme,token)
			tableOfSymb[len(tableOfSymb)+1] = (numLine,lexeme,token,'')
		lexeme=''
		numChar=putCharBack(numChar) # зірочка
		state=0
	if state in (11, 13, 16, 17, 20, 21, 22):         # assign_op
		lexeme+=char
		token=getToken(state,lexeme)
		print('{0:<3d} {1:<10s} {2:<10s} '.format(numLine,lexeme,token))
		tableOfSymb[len(tableOfSymb)+1] = (numLine,lexeme,token,'')
		lexeme='' 
		state=0
	if state in (101,102):  # ERROR
		fail()

def fail():
	global state,numLine,char
	print(numLine)
	if state == 101:
		print('Лексичний: у рядку ',numLine,' неочікуваний символ '+char)
	if state == 102:
		print('Лексичний: у рядку ',numLine,' очікувався символ =, а не '+char)
	
		
def is_final(state):
	if (state in F):
		return True
	else:
		return False

def nextState(state,classCh):
	try:
		return stf[(state,classCh)]
	except KeyError:
		return stf[(state,'other')]

def nextChar():
	global numChar
	numChar+=1
	return sourceCode[numChar]

def putCharBack(numChar):
	return numChar-1

def classOfChar(char):
	if char in '.' : res="dot"
	elif char in 'abcdfghijklmnopqrstuvwxyz' : res="Letter"
	elif char in "0123456789" : res="Digit"
	elif char in " \t" : res="ws"
	elif char in "\n" : res="eol"
	elif char in "\r\n" : res="eol"
	elif char in "*/" : res="mult_op"
	elif char in ":+-,=()^<>e?" : res=char
	else: print ('error')
	return res

def getToken(state,lexeme):
	try:
		return tableOfLanguageTokens[lexeme]
	except KeyError:
		return tableIdentFloatInt[state]

def indexVarConst(state,lexeme):
	indx=0
	if state==2:
		indx=tableOfVar.get(lexeme)
		if indx is None:
			indx=len(tableOfVar)+1
			tableOfVar[lexeme]=indx
	if state==6:
		indx=tableOfConst.get(lexeme)
		if indx is None:
			indx=len(tableOfConst)+1
			tableOfConst[lexeme]=indx
	if state==9:
		indx=tableOfConst.get(lexeme)
		if indx is None:
			indx=len(tableOfConst)+1
			tableOfConst[lexeme]=indx
	return indx

lex()
print('-'*30)
print('tableOfSymb:{0}'.format(tableOfSymb))



numRow=1    # номер рядка таблиці розбору

def parse():
        global numRow
        try:
            getToken('program','keyword')
            parseProgName()
            getToken ('var', 'keyword')
            while tableOfSymb[numRow][2] == 'id':
                    parseIdList ()
            getToken('begin','keyword')
            parseStatementList()
            getToken('end','keyword')
            print('Parser: Синтаксичний аналіз завершився успішно')
            return True
        except SystemExit as e:
            print('Parser: Аварійне завершення програми з кодом {0}'.format(e))

def getToken(lexeme,token):
    global numRow
    print('виконується: getToken({0},{1},{2})'.format(numRow,lexeme,token))
    numLine, lex, tok, _ = tableOfSymb[numRow]
    if (lexeme,token) == (lex,tok):
        numRow += 1
        return True
    else: failParse('mismatch of tokens',(numLine,lexeme,token,lex,tok))

def parseProgName():
    global numRow
    print('виконується: parseProgName()')
    numLine, lex, tok, _ = tableOfSymb[numRow]
    if tok != 'id':
        failParse('id',(numLine, lex, tok))
    numRow+=1
    return True

def failParse(str,tuple):
        if str == 'mismatch of tokens':
            (numLine,lexeme,token,lex,tok)=tuple
            print('Praser ERROR: В рядку {0} неочікуваний елемент ({1},{2}). Очікувався - ({3},{4}).'.format(numLine,lex,tok,lexeme,token))
            exit(1)
        elif str == 'mismatch in StatementList':
            (numLine,expected,lex,tok)=tuple
            print('Praser ERROR: В рядку {0} неочікуваний елемент ({1},{2}). Очікувався - {3}.'.format(numLine,lex,tok,expected))
            exit(2)
        elif str == 'id':
            (numLine,lex,tok)=tuple
            print('Praser ERROR: В рядку {0} неочікуваний елемент ({1},{2}). Очікувався - {3}.'.format(numLine,lex,tok,'id'))
            exit(3)
        elif str == 'punct':
            (numLine,lex,tok)=tuple
            print('Praser ERROR: В рядку {0} неочікуваний елемент ({1},{2}). Очікувався - {3}.'.format(numLine,lex,tok,'punct'))
            exit(4)
        elif str == 'brackets_op':
            (numLine,lex,tok)=tuple
            print('Praser ERROR: В рядку {0} неочікуваний елемент ({1},{2}). Очікувався - {3}.'.format(numLine,lex,tok,'brackets_op'))
            exit(5)
        
def parsePunct():
    global numRow
    print('виконується: parsePunct()')
    numLine, lex, tok, _ = tableOfSymb[numRow]
    if tok != 'punct':
        failParse('punct',(numLine, lex, tok))
    getToken(',','punct')
    
def parseIdList():
        global numRow
        print('виконується: parseIdList()')
        while tableOfSymb[numRow][2] == 'id':
                pr()
                numRow += 1
                if 'punct' == tableOfSymb[numRow][2]:
                        parsePunct()
                elif 'int' == tableOfSymb[numRow][1]  or 'real' == tableOfSymb[numRow][1] or 'bool' == tableOfSymb[numRow][1]:
                        numRow += 1
        return True

def parseStatementList():
        global numRow
        print('виконується: parseStatementList()')
        if tableOfSymb[numRow][2] != 'id' and 'do' != tableOfSymb[numRow][1] and 'if' != tableOfSymb[numRow][1] and \
           'read' != tableOfSymb[numRow][1] and 'write' != tableOfSymb[numRow][1]:
            numLine, lex, tok, _ = tableOfSymb[numRow]
            failParse('mismatch in StatementList',(numLine,'id або (for,keyword) або if read write',lex,tok))
        while tableOfSymb[numRow][2] == 'id' or \
            ('keyword' == tableOfSymb[numRow][2] and 'do' == tableOfSymb[numRow][1]) or \
            ('keyword' == tableOfSymb[numRow][2] and 'if' == tableOfSymb[numRow][1]) or \
            ('keyword' == tableOfSymb[numRow][2] and 'read' == tableOfSymb[numRow][1]) or \
            ('keyword' == tableOfSymb[numRow][2] and 'write' == tableOfSymb[numRow][1]):
            parseStatement()
        
        
def parseStatement():
        global numRow
        print('виконується: parseStatement()')
        pr()
        if 'id' == tableOfSymb[numRow][2]:    # якщо наступний токен - ідентифікатор
            parseAssign()
        elif 'keyword' == tableOfSymb[numRow][2] and 'do' == tableOfSymb[numRow][1]:
            parseDo()
        elif 'keyword' == tableOfSymb[numRow][2] and 'if' == tableOfSymb[numRow][1]:
            parseIf()
        elif 'keyword' == tableOfSymb[numRow][2] and 'read' == tableOfSymb[numRow][1]:
            parseRead()
        elif 'keyword' == tableOfSymb[numRow][2] and 'write' == tableOfSymb[numRow][1]:
            parseWrite()
        return True

def parseAssign():
    global numRow
    print('виконується: parseAssign()')
    numLine, lex, tok, _ = tableOfSymb[numRow]
    if tok != 'id':
        failParse('id',(numLine, lex, tok))
    else:
        print('Got token id')
    numRow+=1
    getToken('=','assign_op')
    parseExpr()
    return True

def parseExpr():
    global numRow
    print('виконується: parseExpr()')
    if 'int' == tableOfSymb[numRow][2]  or 'real' == tableOfSymb[numRow][2] or 'bool' == tableOfSymb[numRow][2] or 'id' == tableOfSymb[numRow][2]:
        numRow+=1
    if ('add_op' == tableOfSymb[numRow][2]  or 'mult_op' == tableOfSymb[numRow][2]) and \
       ('int' == tableOfSymb[numRow+1][2]  or 'real' == tableOfSymb[numRow+1][2] or'id' == tableOfSymb[numRow+1][2]):
        numRow+=2
    return True

def parseDo():
        global numRow
        print('виконується: parseDo')
        getToken('do','keyword')
        if tableOfSymb[numRow][2] == 'id':
                parseAssign()
        if 'int' == tableOfSymb[numRow][2]  or 'real' == tableOfSymb[numRow][2] or 'id' == tableOfSymb[numRow][2]:
                numRow+=1
        getToken('while','keyword')
        parseRel()
        getToken('begin','keyword')
        parseStatementList()
        getToken('end','keyword')
        #print('Я сломался!')
        return True

def parseRel():
    global numRow
    print('виконується: parseRel()')
    numLine, lex, tok, _ = tableOfSymb[numRow]
    if tok != 'id':
        failParse('id',(numLine, lex, tok))
    numRow+=1
    getToken('{}'.format(tableOfSymb[numRow][1]),'rel_op')
    if 'int' == tableOfSymb[numRow][2]  or 'real' == tableOfSymb[numRow][2] or 'bool' == tableOfSymb[numRow][2] or 'id' == tableOfSymb[numRow][2]:
        numRow+=1
    failParse('par_op',(numLine, lex, tok))
    return True

def parseIf():
        global numRow
        print('виконується: parseIf')
        getToken('if','keyword')
        parseRel()
        getToken('?','punct')
        parseStatementList()
        getToken(':','punct')
        return True

def parseRead():
        global numRow
        print('виконується: parseIf')
        getToken('read','keyword')
        numLine, lex, tok, _ = tableOfSymb[numRow]
        if '(' != tableOfSymb[numRow][1]:
                failParse('par_op',(numLine, lex, tok))
        numRow+=1
        if 'id' != tableOfSymb[numRow][2]:
                failParse('id',(numLine, lex, tok))
        parseIdList()
        numLine, lex, tok, _ = tableOfSymb[numRow]
        if ')' != tableOfSymb[numRow][1]:
                failParse('par_op',(numLine, lex, tok))
        numRow+=1
        return True

def parseWrite():
        global numRow
        print('виконується: parseIf')
        getToken('write','keyword')
        numLine, lex, tok, _ = tableOfSymb[numRow]
        if '(' != tableOfSymb[numRow][1]:
                failParse('brackets_op',(numLine, lex, tok))
        numRow+=1
        if 'id' != tableOfSymb[numRow][2]:
                failParse('id',(numLine, lex, tok))
        parseIdList()
        numLine, lex, tok, _ = tableOfSymb[numRow]
        if ')' != tableOfSymb[numRow][1]:
                failParse('brackets_op',(numLine, lex, tok))
        numRow+=1

def pr():
    print(tableOfSymb[numRow])

parse()             

