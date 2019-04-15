from flask_sqlalchemy import SQLAlchemy
from app import db

class Todo(db.Model):
    __tablename__ = 'todos'
    id = db.Column(db.Integer, primary_key=True, autoincrement=True)
    title = db.Column(db.String(255))
    text = db.Column(db.String(1000))
    color = db.Column(db.String(24))
    user_id = db.Column(db.Integer, db.ForeignKey('users.id'))
    done = db.Column(db.Boolean, default=False)

    def __init__(self, title, text, color, user_id):
        self.title = title
        self.text = text
        self.color = color
        self.user_id = user_id

    def to_dict(self):
        return {
            'id': self.id,
            'title': self.title,
            'text': self.text,
            'color': self.color,
            'done': self.done,
        }

    def __repr__(self):
        return "Todo<%d> %s" % (self.id, self.title)

