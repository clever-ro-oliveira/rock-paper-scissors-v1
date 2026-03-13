async function play(move) {
  const response = await fetch("api.php?action=play", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "move=" + move,
  });

  const data = await response.json();

  document.getElementById("result").innerHTML =
    "Computador jogou: " + data.computer + "<br>Resultado: " + data.winner;

  updateScore(data.score);
}

async function loadScore() {
  const response = await fetch("api.php?action=score");
  const score = await response.json();

  updateScore(score);
}

async function resetScore() {
  const response = await fetch("api.php?action=reset", {
    method: "POST",
  });

  const score = await response.json();

  updateScore(score);
}

function updateScore(score) {
  document.getElementById("score").innerHTML =
    "Jogador: " +
    score.player +
    " | Computador: " +
    score.computer +
    " | Empates: " +
    score.draw;
}

loadScore();
