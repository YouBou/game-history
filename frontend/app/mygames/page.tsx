'use client'

import { useState, useEffect } from 'react';
import mygamesData from './sample/mygames.json';
type MygameData = {
    title: string;
    hard: string;
    releaseDate: string;
};
export default function Page() {
    const [data, setData] = useState<MygameData[]>([]);

    useEffect(() => {
        setData(mygamesData);
    }, []);

    return (
        <>
            <h2>ゲーム一覧</h2>
            <table>
                <thead>
                    <tr>
                        <th>タイトル</th>
                        <th>ハード</th>
                        <th>リリース日</th>
                    </tr>
                </thead>
                {data.map((data: any) => (
                    <tr key={data.title}>
                        <td>{data.title}</td>
                        <td>{data.hard}</td>
                        <td>{data.releaseDate}</td>
                    </tr>
                ))}
            </table>
        </>
    )
}