su apt-get install pip
pip install flask
pip install flask-socketio
pip install nltk
pip install textblob

from flask import Flask, render_template
from flask_socketio import SocketIO, emit
from textblob import TextBlob
import random

app = Flask(Vbot)
app.config['SECRET_KEY'] = 'secret!'
socketio = SocketIO(app)

# NLTK Download
import nltk
nltk.download('punkt')

# List of questions and answers
qa_pairs = [
    {
        "question": "What is your name?",
        "answer": "My name is ChatBot.",
    },
    {
        "question": "How are you?",
        "answer": "I'm doing well, thank you.",
    },
    {
        "question": "What can you do?",
        "answer": "I can answer your questions or just have a chat with you.",
    },
    {
        "question": "Who created you?",
        "answer": "I was created by [Your Name Here].",
    },
    {
        "question": "Who created you?",
        "answer": "I was created by [Your Name Here].",
    },
    {
        "question": "Who created you?",
        "answer": "I was created by [Your Name Here].",
    },
    {
        "question": "Who created you?",
        "answer": "I was created by [Your Name Here].",
    },
    {
        "question": "Who created you?",
        "answer": "I was created by [Your Name Here].",
    },
    {
        "question": "Who created you?",
        "answer": "I was created by [Your Name Here].",
    },
]

# Function to generate responses
def generate_response(user_input):
    # Use TextBlob to extract the subject of the user's input
    blob = TextBlob(user_input)
    subject = blob.subjectivity

    # If the subject is more than 0.5, the input is considered a question
    if subject > 0.5:
        for pair in qa_pairs:
            # Check if the user's input matches any of the questions in the list
            if pair["question"].lower() in user_input.lower():
                return pair["answer"]
        return "I'm sorry, I don't understand your question."

    # Otherwise, generate a random response
    else:
        responses = [
            "Interesting.",
            "Tell me more.",
            "I'm not sure I understand.",
            "That's nice.",
            "I see.",
            "Really?",
            "That's amazing.",
            "I'm sorry, I don't understand.",
        ]
        return random.choice(responses)

# Route to the homepage
@app.route('/')
def index():
    return render_template('index.php')

# Function to handle chat messages
@socketio.on('chat message')
def handle_message(message):
    response = generate_response(message)
    emit('bot response', response)

if __name__ == '__main__':
    socketio.run(app)
