from flask import Flask, request, jsonify, render_template
import requests, os

app = Flask(__name__)

API_KEY = os.getenv("USDA_API_KEY")

@app.route("/api/search")
def search_food():

    food = request.args.get("food")

    url = "https://api.nal.usda.gov/fdc/v1/foods/search"

    params = {
        "query": food,
        "api_key": API_KEY
    }

    response = requests.get(url, params=params)

    data = response.json()

    foods = data.get("foods", [])

    if not foods:
        return jsonify({"error": "Food not found"}), 404

    first_food = foods[0]

    nutrients = {}

    for nutrient in first_food.get("foodNutrients", []):

        name = nutrient.get("nutrientName", "")
        value = nutrient.get("value", 0)

        nutrients[name] = value

    result = {
        "name": first_food.get("description"),
        "calories": nutrients.get("Energy", 0),
        "protein": nutrients.get("Protein", 0),
        "carbs": nutrients.get("Carbohydrate, by difference", 0),
        "fat": nutrients.get("Total lipid (fat)", 0)
    }

    return jsonify(result)

@app.route("/api/autocomplete")
def autocomplete():

    query = request.args.get("query")

    url = "https://api.nal.usda.gov/fdc/v1/foods/search"

    params = {
        "query": query,
        "pageSize": 10,
        "api_key": API_KEY
    }

    response = requests.get(url, params=params)

    data = response.json()

    foods = data.get("foods", [])

    results = []

    for food in foods:

        results.append({
            "name": food.get("description"),
            "fdcId": food.get("fdcId")
        })

    return jsonify(results)


@app.route("/")
def home():
    return render_template("index.html")

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000)
