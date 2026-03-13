<?php

class Game
{
    private array $moves = ['pedra', 'papel', 'tesoura'];

    private array $rules = [
        'pedra' => 'tesoura',
        'tesoura' => 'papel',
        'papel' => 'pedra'
    ];

    public function getComputerMove(): string
    {
        return $this->moves[array_rand($this->moves)];
    }

    public function decideWinner(string $player, string $computer): string
    {
        if ($player === $computer) {
            return 'empate';
        }

        if ($this->rules[$player] === $computer) {
            return 'player';
        }

        return 'computer';
    }
}
