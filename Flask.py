pip install flask
pip install chatterbot

from flask import Flask, render_template, request
from chatterbot import ChatBot
from chatterbot.trainers import ChatterBotCorpusTrainer

app = Flask(__name__)
bot = ChatBot('Bot')
trainer = ChatterBotCorpusTrainer(bot)
trainer.train('chatterbot.corpus.english')

@app.route("/")
def home():
    return render_template("index.html")

@app.route("/get")
def get_bot_response():
    user_text = request.args.get('msg')
    return str(bot.get_response(user_text))

if __name__ == "__main__":
    app.run()


app = Flask(__name__)
chatbot = ChatBot('MyChatBot')
trainer = ChatterBotCorpusTrainer(chatbot)
trainer.train("chatterbot.corpus.english")
