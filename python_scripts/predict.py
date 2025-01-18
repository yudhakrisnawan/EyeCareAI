import tensorflow as tf
from tensorflow.keras.models import load_model
from PIL import Image
import numpy as np
from flask import Flask, request, jsonify
from io import BytesIO  # Import BytesIO untuk membaca gambar dari memori

app = Flask(__name__)
model = load_model('model/model.keras')

def preprocess_image(image):
    # Mengubah gambar menjadi array dan memprosesnya
    img = image.resize((224, 224))
    img = np.array(img) / 255.0
    img = np.expand_dims(img, axis=0)
    return img

@app.route('/predict', methods=['POST'])
def predict():
    try:
        file = request.files['image']
        
        # Membaca gambar langsung dari memori tanpa menyimpannya
        img = Image.open(BytesIO(file.read()))  # Membaca gambar dari memori
        processed_img = preprocess_image(img)
        
        # Melakukan prediksi
        prediction = model.predict(processed_img)
        result = "Normal" if prediction[0] > 0.5 else "Cataract"
        
        return jsonify({"result": result})
    except Exception as e:
        return jsonify({"error": str(e)}), 500

if __name__ == '__main__':
    app.run(port=5000, debug=True)
