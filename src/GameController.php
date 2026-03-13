<?php

require_once __DIR__ . '/Game.php';
require_once __DIR__ . '/ScoreBoard.php';

class GameController
{
    private Game $game;
    private ScoreBoard $score;

    public function __construct()
    {
        $this->game = new Game();
        $this->score = new ScoreBoard(__DIR__ . '/../storage/score.json');
    }

    public function play(string $playerMove): array
    {
        $computer = $this->game->getComputerMove();
        $winner = $this->game->decideWinner($playerMove, $computer);

        $this->score->update($winner);

        return [
            'player' => $playerMove,
            'computer' => $computer,
            'winner' => $winner,
            'score' => $this->score->getScore()
        ];
    }

    public function score(): array
    {
        return $this->score->getScore();
    }

    public function reset(): array
    {
        $this->score->reset();
        return $this->score->getScore();
    }
}
