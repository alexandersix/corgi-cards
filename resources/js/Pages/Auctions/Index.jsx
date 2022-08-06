import React from "react";
import Authenticated from "@/Layouts/Authenticated";
import { Head, Link } from "@inertiajs/inertia-react";

export default function Create({ auth, errors, auctions }) {
    return (
        <Authenticated
            auth={auth}
            errors={errors}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Auction House
                </h2>
            }
        >
            <Head title="Auction House" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="grid grid-cols-3 gap-8 w-full mb-12">
                        {auctions.data.map((auction) => {
                            return (
                                <div key={auction.id} className="flex flex-col justify-between bg-white overflow-hidden shadow rounded-lg">
                                    <div>
                                        <div className="px-4 pt-5 pb-2 sm:px-4">
                                            <h3 className="font-bold text-lg">
                                                {auction.card.name}
                                            </h3>
                                        </div>
                                        <div className="px-4 py-3 sm:p-4">
                                            <img
                                                className="rounded-lg mb-2"
                                                src={auction.card.cover_image}
                                                alt={`A picture of ${auction.card.name}`}
                                            />
                                            <p>{auction.card.description}</p>

                                            <h4 className="font-bold text mb-1 mt-6">
                                                Card Stats
                                            </h4>
                                            <div className="space-y-2 pb-6">
                                                <p>
                                                    <span className="font-semibold">
                                                        Cuteness:
                                                    </span>{" "}
                                                    {auction.card.cuteness}
                                                </p>
                                                <p>
                                                    <span className="font-semibold">
                                                        Playfulness:
                                                    </span>{" "}
                                                    {auction.card.playfulness}
                                                </p>
                                                <p>
                                                    <span className="font-semibold">
                                                        Loudness
                                                    </span>{" "}
                                                    {auction.card.loudness}
                                                </p>
                                                <p>
                                                    <span className="font-semibold">
                                                        Smartness
                                                    </span>{" "}
                                                    {auction.card.smartness}
                                                </p>
                                            </div>

                                            <h4 className="font-bold text mb-1 mt-3">
                                                Auction Details
                                            </h4>
                                            <div className="space-y-2 mb-6">
                                                <p>
                                                    <span className="font-semibold">
                                                        Seller:
                                                    </span>{" "}
                                                    {auction.seller.name}
                                                </p>
                                                <p>
                                                    <span className="font-semibold">
                                                        Current Bid:
                                                    </span>{" "}
                                                    {auction.displayCurrentBid}
                                                </p>
                                                <p>
                                                    <span className="font-semibold">
                                                        Buyout Price:
                                                    </span>{" "}
                                                    {auction.displayBuyoutPrice}
                                                </p>
                                                <p>
                                                    <span className="font-semibold">
                                                        Ends At:
                                                    </span>{" "}
                                                    {new Date(auction.ends_at).toLocaleString()}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="px-4 py-4 sm:px-4">
                                        <a
                                            href={route("auction.create-bid", {
                                                auction: auction,
                                            })}
                                            className="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                        >
                                            Place Bid
                                        </a>
                                    </div>
                                </div>
                            );
                        })}
                    </div>
                    {/* {{ $auctions->links() }} */}
                </div>
            </div>
        </Authenticated>
    );
}
