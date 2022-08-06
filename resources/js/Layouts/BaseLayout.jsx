import React, { useEffect, useState } from "react";

export const BaseLayout = ({ children }) => {
    const [seconds, setSeconds] = useState(0);

    useEffect(() => {
        const interval = setInterval(() => {
            setSeconds((seconds) => seconds + 1);
        }, 1000);

        return () => clearInterval(interval);
    }, []);

    return (
        <>
            {children}
            <div className="bg-white rounded shadow-slate-50 drop-shadow-md max-w-sm fixed bottom-4 right-4 p-4">
                <h3 className="font-bold text-lg">Auction in progress</h3>

                <p>
                    <span className="font-semibold">Seconds Elapsed:</span> {seconds}
                </p>

                <p>
                    <span className="font-semibold">Card for sale:</span>
                </p>
                <p>
                    <span className="font-semibold">Auction Ends:</span>
                </p>
            </div>
        </>
    );
};
