from flask import Flask, request , render_template
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

@app.route ('/Experiment.html')
def experiment ():
    return render_template("Experiment.html")

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
    app.run()
