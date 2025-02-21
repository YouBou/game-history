'use client'

import { useState, useEffect } from 'react';

type SearchConditionData = {
    keyword: string;
}

type InputData = {
    keyword: string;
}


export default function Page() {
    const [input, setInput] = useState<InputData>({
        keyword: '' 
    });

    const handleInput = (e: React.ChangeEvent<HTMLInputElement>) => {
        const { value, name } = e.target;
        setInput({...input, [name]: value});
    };

    return (
        <>
            <h2>Games</h2>
            <p>Games are fun!</p>
            <input type="text" name="keyword" onChange={handleInput}/>
            <button>search</button>
        </>
    )
}                                                                                               