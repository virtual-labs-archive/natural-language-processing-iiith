from flask import Flask, request ,redirect , render_template
# set the project root directory as the static folder, you can set others.
app = Flask(__name__, static_url_path='')
from flask_sqlalchemy import SQLAlchemy
from flask import json,jsonify



SQLALCHEMY_TRACK_MODIFICATIONS=False

app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:////tmp/test5.db'
db = SQLAlchemy(app)
ansc=0
class BigramTable (db.Model):
    id = db.Column(db.Integer,primary_key=True)
    formid = db.Column (db.Integer(),unique=False,nullable=True)
    corpus = db.Column (db.Integer(),unique=False , nullable=True  )
    answer = db.Column (db.String(4),unique=False ,nullable=True )

    def __init__ (self,corpus,formid,answer):
        self.corpus= corpus
        self.formid = formid 
        self.answer= answer 

#    def __repr__(self) :
#        return '<User %r>' % self.formid % self.answer

db.create_all()

def create (): 
    sentence1= "(eos) Can I sit near you (eos) You can sit (eos) Sit near him (eos) I can sit you (eos)"
    sentence1=sentence1.upper()
    print("hello")
    sentence1=sentence1.split()
    sentence=[]
    for i in sentence1:
        if i not in sentence:
            sentence.append(i)
    count=0 
    corpus=0
    a=BigramTable.query.all()
    for i in range(len(sentence)):
        for j in range(len(sentence)):
            strr=sentence[i]+" "+sentence[j]
            formid=count
            count+=1
            counti=0
            countt=0
            for k in range(len(sentence1)):
                if sentence1[k]==sentence[i]:
                    counti+=1
                    if k!=len(sentence1)-1 and sentence[j]==sentence1[k+1]:
                        countt+=1
            answer=float(countt)/counti
            f=0
            for bigram in a:
                if bigram.formid==formid and bigram.corpus==corpus: f=1
            if f==0:
                db.create_all()
                newentry=BigramTable(corpus,formid,answer)
                db.session.add(newentry)
                db.session.commit()
            # print(strr,corpus,formid,answer)
    sentence1= "(eos) You book a car (eos) I can read a book in the park (eos) Park the car (eos) Can you read the book (eos)"
    sentence1=sentence1.upper()
    print("hello")
    sentence1=sentence1.split()
    sentence=[]
    for i in sentence1:
        if i not in sentence:
            sentence.append(i)
    count=0 
    corpus=1
    a=BigramTable.query.all()
    for i in range(len(sentence)):
        for j in range(len(sentence)):
            strr=sentence[i]+" "+sentence[j]
            formid=count
            count+=1
            counti=0
            countt=0
            for k in range(len(sentence1)):
                if sentence1[k]==sentence[i]:
                    counti+=1
                    if k!=len(sentence1)-1 and sentence[j]==sentence1[k+1]:
                        countt+=1
            answer=float(countt)/counti
            f=0
            for bigram in a:
                if bigram.formid==formid and bigram.corpus==corpus: f=1
            if f==0:
                db.create_all()
                newentry=BigramTable(corpus,formid,answer)
                db.session.add(newentry)
                db.session.commit()
            print(strr,corpus,formid,answer)
create()
db.create_all()

print ("exec complete")

@app.route('/')
def root():
    return render_template("Introduction.html")

@app.route ('/Introduction.html')
def Introduction():
    return render_template("Introduction.html")

@app.route ('/Theory.html')
def Theory():
    return render_template("Theory.html")

@app.route ('/Objective.html')
def Objective():
    return render_template("Objective.html")

@app.route ('/Quizzes.html')
def Quizzes():
    return render_template("Quizzes.html")


@app.route ('/Experiment.html',methods=['GET','POST'])
def Experiment():
        return render_template("Experiment.html",mystr=[],n=0)

@app.route ('/checkans.html',methods=['GET','POST'])
def checkanswers():
    userans=""
    print("kookokokook")
    cno=int(request.form["cno"])
    print(str(cno),type(cno))
    count=0
    if(cno==0):
        count=7
    else:
        count=11
    answers=BigramTable.query.all()
    # print(answers)
    # for ans in answers:
        # print(ans.formid,ans.corpus,ans.answer)
    for i in range(count*count):
        inputans=str(request.form['#n'+str(i)])
        # print("ffff")
        f=0
        for ans in answers:
            # print(i)
            # print(ans.formid,i,ans.corpus,cno)
            if(str(ans.formid)==str(i) and str(ans.corpus)==str(cno)):
                f=1
                print(i,ans.answer)
                if abs(float(ans.answer)-float(inputans))<0.01:
                    userans+='1'
                else:
                    userans+='0'
        if(f==0):
            print("f is false for ",i)
    print(2)
    print(userans)
    return userans

@app.route ('/Procedure.html')
def root5():
    return render_template("Procedure.html")

@app.route ('/Further Readings.html')
def root6():
    return render_template("Further Readings.html")


@app.route ('/Feedback.html')
def root7():
    return render_template("Feedback.html")
@app.route ('/showanswer0.html')
def root8():
        return render_template("showanswer0.html")
@app.route ('/showanswer1.html')
def root9():
        return render_template("showanswer1.html")


if __name__ == "__main__":
    mystr2 ="hello boy hi " 
    ansc=0
    app.run()
