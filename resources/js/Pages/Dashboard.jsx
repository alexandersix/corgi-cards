import React from "react";
import Authenticated from "@/Layouts/Authenticated";
import { Head, Link } from "@inertiajs/inertia-react";
import { BaseLayout } from "@/Layouts/BaseLayout";

const Dashboard = (props) =>  {
    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Your Cards
                </h2>
            }
        >
            <Head title="Your Cards" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="grid grid-cols-3 gap-8 w-full">
                        {props.cards.map((card) => {
                            return (
                                <div
                                    key={card.id}
                                    className="flex flex-col justify-between bg-white overflow-hidden shadow rounded-lg"
                                >
                                    <div>
                                        <div className="px-4 pt-5 pb-2 sm:px-4">
                                            <h3 className="font-bold text-lg">
                                                {card.name}
                                            </h3>
                                        </div>
                                        <div className="px-4 py-3 sm:p-4">
                                            <img
                                                className="rounded-lg mb-2"
                                                src={card.cover_image}
                                                alt={`A picture of ${card.name}`}
                                            />
                                            <p>{card.description}</p>

                                            <h4 className="font-bold text mb-1 mt-3">
                                                Card Stats
                                            </h4>
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
                                    <div className="px-4 py-4 sm:px-4">
                                        <Link
                                            className="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                            href={route("card.show", {
                                                card: card,
                                            })}
                                        >
                                            View Card
                                        </Link>
                                    </div>
                                </div>
                            );
                        })}
                    </div>
                </div>
            </div>
        </Authenticated>
    );
}

Dashboard.layout = page => <BaseLayout children={page} />

export default Dashboard;
