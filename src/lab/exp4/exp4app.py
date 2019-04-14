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

# @app.route ('/Introduction.html')
#     return render_template("Introduction.html")

# @app.route ('/Introduction.html')
#     return render_template("Introduction.html")

# @app.route ('/Introduction.html')
#     return render_template("Introduction.html")

# @app.route ('/Introduction.html')
#     return render_template("Introduction.html")

# @app.route ('/Introduction.html')
#     return render_template("Introduction.html")

# @app.route ('/Introduction.html')
#     return render_template("Introduction.html")



if __name__ == "__main__":
    app.run()
