<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rapport de Ventes</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      text-align: center;
      border: 2px solid #ccc; /* Ajoute une bordure de 2px solide autour du conteneur */
      border-radius: 10px; /* Ajoute un rayon de 10px pour adoucir les coins */
    }

    .input-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="date"] {
      padding: 5px;
      width: 100%;
      box-sizing: border-box;
    }

    button {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      cursor: pointer;
      margin-right: 10px; /* Ajout de marge à droite pour séparer les boutons */
    }

    #rapport {
      margin-top: 20px;
      text-align: left;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 1px solid black; 
      padding: 8px; 
      text-align: left; 
    }

    th {
      background-color: #f2f2f2; 
    }

    tr {
      transition: all .2s ease-in;
      cursor:pointer;
    }

    #header {
      background-color:#16a085;
      color:#fff;
    }

    h1 {
      font-weight:700;
      text-align:center;
      background-color:#16a085;
      color:#fff;
      padding:10px 0px;
    }

    tr:hover {
      background-color:#f5f5f5;
    }

    #total-section {
      background-color: #16a085; 
      padding: 10px;
      margin-top: 20px;
      border-radius: 10px;
    }

    #total-section p {
      font-size: 18px;
      color: #fff; 
      margin-bottom: 10px;
    }

    .return-button {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      font-size: 16px; 
    }

  </style>
</head>
<body>
  <div class="container">
    <h1>Rapport des Ventes</h1>
    <form action="/getDate" method="get">
      @csrf
      <div class="input-group">
        <label for="end-date">Donner la date :</label>
        <input type="date" id="end-date" name="dateF" value="{{ old('dateF') }}">
        @error("dateF")
          <p style="color: red;">{{ $message }}</p>
        @enderror
      </div>
      <button onclick="afficherRapport()">Afficher le Rapport</button>
      <a href="/dashboard" class="return-button"><i class="fas fa-arrow-left"></i> Retour</a>
    </form>
    @if(isset($data) && count($data) > 0)
      <div id="rapport">
        <table>
          <thead>
            <th>Serveurs</th>
            <th>Email</th>
            <th>Prix</th>
            <th>Numero de table</th>
          </thead>
          <tbody>
            @foreach($data as $vente)
              <tr>
                <td>{{ $vente->user_name }}</td>
                <td>{{ $vente->email }}</td>
                <td>{{ $vente->price }}</td>
                <td>{{ $vente->num }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div id="total-section">
        <p>Total est : {{ $somme }}</p>
      </div>

    @endif
  </div>
  <script src="script.js">
    function afficherRapport() {
      var startDate = document.getElementById("start-date").value;
      var endDate = document.getElementById("end-date").value;

      // Ici, vous pouvez exécuter une requête AJAX pour récupérer le rapport de ventes
      // et l'afficher dans la div #rapport
      var rapport = "Rapport de ventes du " + startDate + " au " + endDate;
      document.getElementById("rapport").innerText = rapport;
    }
  </script>
</body>
</html>
