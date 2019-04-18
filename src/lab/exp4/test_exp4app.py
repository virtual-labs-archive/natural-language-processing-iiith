from flask_sqlalchemy import SQLAlchemy
from exp4app import app,BigramTable
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:////tmp/test6.db'
db = SQLAlchemy(app)
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
def checkanswers(cno,inputans):
    userans=""
    # print("kookokokook")
    # print(str(cno),type(cno))
    count=0
    if(cno==0):
        count=7
    else:
        count=11
    answers=BigramTable.query.all()
    for i in range(count*count):
        # print("ffff")
        f=0
        for ans in answers:
            if(str(ans.formid)==str(i) and str(ans.corpus)==str(cno)):
                f=1
                # print(i,ans.answer)
                if abs(float(ans.answer)-float(inputans[i]))<0.01:
                    userans+='1'
                else:
                    userans+='0'
    return userans
def check():
    inputans=[]
    for i in range(49):
        if(i%2==0):
            inputans.append(0)
        else:
            inputans.append(0.2)
    assert checkanswers(0,inputans)=="1101111010001010101010101000101010000010100010101"
    inputans=[]
    for i in range(121):
        if(i%2==0):
            inputans.append(0)
        else:
            inputans.append(0.2)
    assert checkanswers(1,inputans)=="1110110010001010100010001010100010101010101000101010101010101010101010101010101000101000101010101010101010101000101010101"

check()