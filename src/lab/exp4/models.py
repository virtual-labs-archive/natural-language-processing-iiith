from flask import Flask, jsonify, render_template
from flask_sqlalchemy import SQLAlchemy


from flask import request
from flask import json

from flask import jsonify


app = Flask(__name__, static_url_path='')



app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:////tmp/test1.db'


db = SQLAlchemy(app)

class BigramTable (db.Model):
    id = db.Column(db.Integer,primary_key=True)
    formid = db.Column (db.Integer(),unique=False,nullable=False)
    corpus = db.Column (db.Integer(),unique=False , nullable=False  )
    answer = db.Column (db.String(4),unique=False ,nullable=False )

    def __init__ (self,corpus,formid,answer):
        self.corpus= corpus
        self.formid = formid 
        self.answer= answer 

#    def __repr__(self) :
#        return '<User %r>' % self.formid % self.answer



def create ():
    sentence1= "(eos) Can I sit near you (eos) You can sit (eos) Sit near him (eos) I can sit you (eos)"
    sentence1=sentence1.split()
    sentence=[]
    for i in sentence1:
        if i not in sentence:
            sentence.append(i)
    count=0
    corpus=0
    for i in range(len(sentence)):
        for j in range(len(sentence)):
            formid=count
            count+=1
            counti=0
            countt=0
            for k in range(len(sentence1)):
                if sentence1[k]==sentence[i]:
                    counti+=1
                    if sentence[j]==sentence1[i+1]:
                        countt+=1
            answer=float(countt)/counti
            db.create_all()
            newentry=BigramTable(corpus,formid,answer)
            db.session.add(newentry)
            db.session.commit()

db.create_all()

print ("exec complete")




