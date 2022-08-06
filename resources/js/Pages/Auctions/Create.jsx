import React from "react";
import Authenticated from "@/Layouts/Authenticated";
import { Head, Link, useForm, useRemember } from "@inertiajs/inertia-react";
import Label from "@/Components/Label";
import Input from "@/Components/Input";
import Button from "@/Components/Button";

export default function Create({ auth, errors, card }) {
    // Save local state to the browser history with useRemember
    // const [formState, setFormState] = useRemember();

    const { data, setData, post, processing, formErrors } = useForm(
        "Auction/Create",
        {
            card_id: card.id,
            seller_id: card.user_id,
            current_bid: 0,
            buyout_price: 0,
            ends_at: "",
        }
    );

    function onHandleChange(event) {
        setData(
            event.target.name,
            event.target.type === "checkbox"
                ? event.target.checked
                : event.target.value
        );
    }

    function submit(event) {
        event.preventDefault();
        post(route("auction.store"));
    }

    return (
        <Authenticated
            auth={auth}
            errors={errors}
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

                        <form className="space-y-4" onSubmit={submit}>
                            <Label
                                forInput="current_bid"
                                value="Starting Bid"
                            />
                            <Input
                                type="text"
                                name="current_bid"
                                value={data.current_bid}
                                isFocused={true}
                                handleChange={onHandleChange}
                            />

                            <Label
                                forInput="buyout_price"
                                value="Buyout Price"
                            />
                            <Input
                                type="text"
                                name="buyout_price"
                                value={data.buyout_price}
                                handleChange={onHandleChange}
                            />

                            <Label forInput="ends_at" value="Buyout Price" />
                            <Input
                                type="datetime-local"
                                name="ends_at"
                                value={data.ends_at}
                                handleChange={onHandleChange}
                            />

                            <Button processing={processing}>
                                Start Auction
                            </Button>
                        </form>
                    </div>
                </div>
            </div>
        </Authenticated>
    );
}
