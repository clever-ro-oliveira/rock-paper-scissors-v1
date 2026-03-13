<?php

class ScoreBoard
{
    private string $file;

    public function __construct(string $file)
    {
        $this->file = $file;

        if (!file_exists($file)) {
            file_put_contents($file, json_encode([
                'player' => 0,
                'computer' => 0,
                'draw' => 0
            ]));
        }
    }

    public function getScore(): array
    {
        return json_decode(file_get_contents($this->file), true);
    }

    public function update(string $winner): void
    {
        $score = $this->getScore();

        if ($winner === 'player') {
            $score['player']++;
        } elseif ($winner === 'computer') {
            $score['computer']++;
        } else {
            $score['draw']++;
        }

        file_put_contents($this->file, json_encode($score));
    }

    public function reset(): void
    {
        file_put_contents($this->file, json_encode([
            'player' => 0,
            'computer' => 0,
            'draw' => 0
        ]));
    }
}
