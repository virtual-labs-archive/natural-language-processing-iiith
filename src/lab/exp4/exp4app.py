from flask import Flask, request , render_template
# set the project root directory as the static folder, you can set others.
app = Flask(__name__, static_url_path='')


a = ""

def get_a():
    return a

@app.route('/')
def root():
    return render_template("Introduction.html")

@app.route ('/Introduction.html')
def root1():
    return render_template("Introduction.html")

@app.route ('/Theory.html')
def root2():
    return render_template("Theory.html")

@app.route ('/Objective.html')
def root3():
    return render_template("Objective.html")

@app.route ('/Quizzes.html')
def root4():
    return render_template("Quizzes.html")

@app.route('/parse',methods=['GET','POST'])
def rootwq():
    global mystr1  
    mystr1 = ""
    mystr1+= str(request.get_data())
#    mystr1=mystr1.split(" ")
    mystr1=mystr1[2:-1:]
    a = mystr1
  #  print (mystr1)
    print(a)
    return mystr1

@app.route ('/Experiment.html')
def experiment ():
    global mystr1
#    mystr1 = mystr1.split()
    a = get_a()
    print (a)
    if mystr1 == "" or mystr1 ==[] or len (mystr1)==0 :
        return render_template("Experiment.html",mystr=["dsfd","dsfdg","dfs"],n=3)
    else: 
        return render_template("Experiment.html",mystr=a,n=len(mystr1))

@app.route ('/Procedure.html')
def root5():
    return render_template("Procedure.html")

@app.route ('/Further Readings.html')
def root6():
    return render_template("Further Readings.html")


@app.route ('/Feedback.html')
def root7():
    return render_template("Feedback.html")

# @app.route ('/Introduction.html')
#     return render_template("Introduction.html")

# @app.route ('/Introduction.html')
#     return render_template("Introduction.html")

# @app.route ('/Introduction.html')
#     return render_template("Introduction.html")



if __name__ == "__main__":
    mystr1 ="" 
    app.run()
