from flask import Flask, request ,redirect , render_template
# set the project root directory as the static folder, you can set others.
app = Flask(__name__, static_url_path='')




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
#    global mystr1  
#    mystr1 = ""
    mystr2 += str(request.get_data())
#    mystr1=mystr1.split(" ")
    mystr1=mystr1[2:-1:]
    print (mystr2)
    return redirect('/Experiment.html')


@app.route ('/Experiment.html')
def experiment ():
#    global mystr1
#    mystr1 =rootwq()
    mystr = str(mystr2).split()
#    print (mystr,"dfsgdfg")
    if mystr == "" or mystr ==[] or len (mystr)==0 :
        return render_template("Experiment.html",mystr=["abc","bcd","cda"],n=3)
    else: 
        return render_template("Experiment.html",mystr=mystr,n=len(mystr))

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
    mystr2 ="hello boy hi " 
    app.run()
