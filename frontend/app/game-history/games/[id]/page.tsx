'use client'

import React, { useState, useEffect } from 'react';
import axios from 'axios';

type GameData = {
    name: string;
    cover: {
        url: string;
    }
}

export default function Page() {
    const [game, setGame] = useState<GameData>({
        name: '',
        cover: {
            url: ''
        }
    });

    useEffect(() => {
        const fetchGame = async () => {
            const pathParts = window.location.pathname.split('/');
            const gameId = pathParts[pathParts.length - 1];

            const res = await axios.get(`http://127.0.0.1:8000/api/games/${gameId}`);
            setGame(res.data);
        };
        fetchGame();
    }, []);

    return (
        <>
            <h2>Game</h2>
            <p>Game Info</p>

            <table>
                <thead>
                    <tr>
                        <th>タイトル</th>
                        <th>カバー</th>
                    </tr>
                </thead>
                <tr>
                    <td>{game.name}</td>
                    <td><img src={game.cover.url} /></td>
                </tr>
            </table>
        </>
    )
}