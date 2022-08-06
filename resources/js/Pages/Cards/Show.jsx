import React from "react";
import Authenticated from "@/Layouts/Authenticated";
import { Head, Link } from "@inertiajs/inertia-react";

export default function Show(props) {
    const card = props.card;
    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    {card.name}
                </h2>
            }
        >
            <Head title={card.name} />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="grid grid-cols-2 gap-8 items-center">
                        <div>
                            <img
                                className="w-full rounded-xl mb-4"
                                src={card.cover_image}
                                alt={`A photo of ${card.name}`}
                            />
                            <Link href={route('auction.create', {card: card})} className="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Sell
                            </Link>
                        </div>
                        <div>
                            <p className="mb-4">{card.description}</p>

                            <h3 className="font-bold text-lg mb-1">
                                Card Stats
                            </h3>
                            <div className="space-y-2">
                                <p>
                                    <span className="font-semibold">
                                        Cuteness:
                                    </span>{" "}
                                    {card.cuteness}
                                </p>
                                <p>
                                    <span className="font-semibold">
                                        Playfulness:
                                    </span>{" "}
                                    {card.playfulness}
                                </p>
                                <p>
                                    <span className="font-semibold">
                                        Loudness
                                    </span>{" "}
                                    {card.loudness}
                                </p>
                                <p>
                                    <span className="font-semibold">
                                        Smartness
                                    </span>{" "}
                                    {card.smartness}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Authenticated>
    );
}
