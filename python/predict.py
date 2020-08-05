import numpy as np
import pandas as pd
from flask import Flask, request, jsonify, render_template
from flask_mysqldb import MySQL
import pickle

app = Flask(__name__)
model = pickle.load(open('python/model.pkl', 'rb'))

app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_PORT'] = 3307
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'db_rekom_loker'

mysql = MySQL(app)

@app.route('/', methods=['GET'])
def rekom():
    rekom = mysql.connection.cursor()
    rekom.execute("SELECT * FROM transforms",)
    rv = rekom.fetchall()
    rekom.close()
    return render_template('home.html', komker=rv)

@app.route('/predict',methods=['POST'])
def predict():
    '''
    For rendering results on HTML GUI
    '''
    int_features = [int(x) for x in request.form.values()]
    final_features = [np.array(int_features)]
    # print(final_features)
    prediction = model.predict(final_features)

    # arr2 = np.array(prediction).reshape(1, -1)
    # my_prediction = NB.predict(arr2)
    # output = round(arr2)

    return render_template('result.html', predictions = prediction)

@app.route('/predict_api',methods=['POST'])
def predict_api():
    '''
    For direct API calls through request
    '''
    # get data
    data = request.get_json(force=True)

    # convert data into array
    int_features = [int(x) for x in data.values()]
    final_features = [np.array(int_features)]

    # predictions
    result = model.predict(final_features)

    # send back to browser
    output = int(result[0])

    # return data
    return jsonify(results=output)

if __name__ == "__main__":
    app.run(debug=True)