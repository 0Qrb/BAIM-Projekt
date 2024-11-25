from flask import Flask, request, render_template, redirect, make_response, url_for

app = Flask(__name__)

# Prosta baza danych użytkowników (do celów demonstracyjnych)
USERS = {
    "user1": "password1",
    "user2": "password2"
}

@app.route('/')
def home():
    session_id = request.cookies.get('session_id')
    if session_id:
        return render_template('home.html', username=session_id)
    return render_template('home.html', username=None)

@app.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        username = request.form.get('username')
        password = request.form.get('password')
        if username in USERS and USERS[username] == password:
            resp = make_response(redirect(url_for('home')))
            resp.set_cookie('session_id', username)
            return resp
        return render_template('login.html', error="Zły login i/lub hasło")
    return render_template('login.html')

@app.route('/logout')
def logout():
    resp = make_response(redirect(url_for('home')))
    #
    return resp

if __name__ == '__main__':
    app.run(debug=True)
