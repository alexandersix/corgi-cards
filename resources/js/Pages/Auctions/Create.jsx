import React from "react";
import Authenticated from "@/Layouts/Authenticated";
import { Head, Link } from "@inertiajs/inertia-react";

export default function Create(props) {
    const card = props.card;
    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Create Auction
                </h2>
            }
        >
            <Head title="Create Auction" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto px-6 lg:px-8">
                    <div className="grid grid-cols-2 gap-8 items-center">
                        <div>
                            <img
                                className="w-full rounded-xl mb-4"
                                src={card.cover_image}
                                alt={`A photo of ${card.name}`}
                            />
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

                        {/* <form className="space-y-4" method="POST" action="{{ route('auction.store') }}"> */}
                        {/**/}
                        {/*     <input hidden id="card_id" name="card_id" value="{{$card->id}}" /> */}
                        {/*     <input hidden id="seller_id" name="seller_id" value="{{$card->user_id}}" /> */}
                        {/**/}
                        {/*     <div> */}
                        {/*         <x-label for="current_bid" value="Starting Bid" /> */}
                        {/**/}
                        {/*         <x-input id="current_bid" className="block mt-1 w-full" type="text" name="current_bid" :value="old('current_bid')" required autofocus /> */}
                        {/*     </div> */}
                        {/**/}
                        {/*     <div> */}
                        {/*         <x-label for="buyout_price" value="Buyout Price" /> */}
                        {/**/}
                        {/*         <x-input id="buyout_price" className="block mt-1 w-full" type="text" name="buyout_price" :value="old('buyout_price')" /> */}
                        {/*     </div> */}
                        {/**/}
                        {/*     <div> */}
                        {/*         <x-label for="ends_at" value="Auction Ends At" /> */}
                        {/**/}
                        {/*         <x-input id="ends_at" className="block mt-1 w-full" type="datetime-local" name="ends_at" :value="old('ends_at')" /> */}
                        {/*     </div> */}
                        {/**/}
                        {/*     <x-button>Start Auction</x-button> */}
                        {/* </form> */}
                    </div>
                </div>
            </div>
        </Authenticated>
    );
}
