<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Preferences</title>
    <style>
        
        body {
            background-image: url('login.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #fff;
        }

         
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        
        .form-container {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 2px solid #fff;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.3);
            color: #fff;
            font-size: 1.1em;
        }

        button {
            width: 100%;
            padding: 10px;
            font-size: 1.2em;
            background-color: #ff9800;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #e68900;
        }

        #preferences {
            margin-top: 20px;
            font-size: 1.1em;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 10px;
        }

        #preferences p {
            margin: 0;
            padding: 5px 0;
        }

        .error-message {
            color: #ff6666;
        }

        .loading-message {
            color: #ffeb3b;
        }
    </style>
    <script>
        async function fetchPreferences() {
            const userId = document.getElementById("userId").value;
            const preferencesDiv = document.getElementById("preferences");
            preferencesDiv.innerHTML = '<p class="loading-message">Loading...</p>'; 

            try {
                const response = await fetch(`fetch_preferences.php?user_id=${userId}`);
                if (!response.ok) throw new Error('Network response was not ok');
                const data = await response.json();

                if (data.error) {
                    preferencesDiv.innerHTML = `<p class="error-message">${data.error}</p>`;
                } else {
                    preferencesDiv.innerHTML = `
                        <p><strong>Name:</strong> ${data.name}</p>
                        <p><strong>Username:</strong> ${data.username}</p>
                        <p><strong>Gender:</strong> ${data.gender}</p>
                        <p><strong>Email:</strong> ${data.email}</p>
                        <p><strong>Phone:</strong> ${data.phone}</p>
                        <p><strong>Reference:</strong> ${data.reference}</p>
                        <p><strong>Preferred places:</strong> ${data.places}</p>
                        <p><strong>Budget:</strong> ${data.budget}</p>
                        <p><strong>Travel Preference:</strong> ${data.preference}</p>
                    `;
                }
            } catch (error) {
                preferencesDiv.innerHTML = '<p class="error-message">Failed to retrieve data. Please try again.</p>';
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1>Check Preferences</h1>
            <input type="text" id="userId" placeholder="Enter Username" />
            <button onclick="fetchPreferences()">Check Preferences</button>
            <div id="preferences"></div>
        </div>
    </div>
</body>
</html>