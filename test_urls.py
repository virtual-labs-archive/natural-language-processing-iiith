import urllib,json
import unittest
from flask import Flask
from flask_testing import LiveServerTestCase 

# Testing with LiveServer
class MyTest(LiveServerTestCase):
    # if the create_app is not implemented NotImplementedError will be raised
    SERVER="http://127.0.0.1:5000/"
    def create_app(self):
        app = Flask(__name__)
        app.config['TESTING'] = True
        app.config['LIVESERVER_PORT'] = 5000
        app.config['LIVESERVER_TIMEOUT']=10
#        print ("asdf")
        return app

    def test_controller_is_up_and_running(self):
        response = urllib.request.urlopen(self.get_server_url())
        self.assertEqual(response.code, 200)
        urllist=["/Introduction.html","/Theory.html","/Objective.html","/Quizzes.html","/Procedure.html","/Feedback.html","/showanswer0.html","/showanswer1.html"]
        for i in range(8):
            response = urllib.request.urlopen(self.get_server_url()+urllist[i])
            self.assertEqual(response.code, 200)
            assert "" != response.read()



if __name__ == '__main__':
    unittest.main()
