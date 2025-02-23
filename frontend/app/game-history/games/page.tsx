'use client'

import React, { useState　} from 'react';
import Link from 'next/link';
import axios from 'axios';

type GameData = {
    gameId: number;
    gameName: string;
}

type InputGameData = {
    keyword: string;
}

export default function Page() {
    const [games, setGames] = useState<GameData[]>([]);
    const [input, setInput] = useState<InputGameData>({
        keyword: ''
    });

    const handleSearch = (event: React.MouseEvent<HTMLElement>) => {
        event.preventDefault();

        axios.get('http://127.0.0.1:8000/api/games/search', {
            params: {
                keyword: input.keyword
            }
        })
            .then((res) => res.data)
            .then((data) => {
                setGames(data)
            });
    }

    const handleInput = (event: React.ChangeEvent<HTMLInputElement>) => {
        const { value, name } = event.target;
        setInput({...input, [name]: value});
    };

    return (
        <>
            <h2>ゲーム一覧</h2>

            <input type="text" name="keyword" value={input.keyword} onChange={handleInput} />
            <button onClick={handleSearch}>検索する</button>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>タイトル</th>
                        <th></th>
                    </tr>
                </thead>
                {games.map((game: any) => (
                    <tr key={game.gameId}>
                        <td>{game.gameId}</td>
                        <td>{game.gameName}</td>
                        <td><Link href={`/game-history/games/${game.gameId}`}>詳細</Link></td>
                    </tr>
                ))}
            </table>
        </>
    )
}                                                                                               