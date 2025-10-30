import { Link, useParams, useNavigate } from "react-router-dom";
import { useEffect, useState } from "react";
import api from "../../api/api";
import { EyeCloseIcon, EyeIcon } from "../../icons";
import Label from "../../components/form/Label";
import Input from "../../components/form/input/InputField";
import Checkbox from "../../components/form/input/Checkbox";
import Button from "../../components/ui/button/Button";

interface User {
    id: number;
    name: string;
    email: string;
    phone: string;
    username: string;
    role_name: string;
    status: string;
    image: string;
}

export default function EditUser() {
    const [user, setUser] = useState<User | null>(null);
    const [error, setError] = useState<string | null>(null);
    const [loading, setLoading] = useState(true);
    const [showPassword, setShowPassword] = useState(false);
    const [isChecked, setIsChecked] = useState(false);
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const { id } = useParams();


    const navigate = useNavigate();

    useEffect(() => {
        const fetchUser = async () => {
            try {
                const response = await api.get(`/users/get-user/${id}`);
                const fetchedUser = response.data?.data;
                setUser(fetchedUser);
            } catch (err) {
                setError("Failed to fetch user");
            } finally {
                setLoading(false);
            }
        };

        if (id) fetchUser();
    }, [id]);

    if (loading) {
        return <p className="text-center py-5">Loading user...</p>;
    }

    if (error) {
        return <p className="text-center text-red-500 py-5">{error}</p>;
    }

    if (!user) {
        return <p className="text-center py-5">No user data found.</p>;
    }
    const handleSubmit = async (e: React.FormEvent) => {
        e.preventDefault();
        setLoading(true);
        setError("");

    };
    return (
        <form onSubmit={handleSubmit}>
            <div className="space-y-5">
                <div className="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div className="sm:col-span-1">
                        <Label>
                            Name<span className="text-error-500">*</span>
                        </Label>
                        <Input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Enter your name"
                        />
                    </div>
                    <div className="sm:col-span-1">
                        <Label>
                            Username<span className="text-error-500">*</span>
                        </Label>
                        <Input
                            type="text"
                            id="username"
                            name="username"
                            placeholder="Enter your username"
                        />
                    </div>
                    <div className="sm:col-span-1">
                        <Label>
                            Email<span className="text-error-500">*</span>
                        </Label>
                        <Input
                            type="text"
                            id="email"
                            name="email"
                            placeholder="Enter your email"
                        />
                    </div>
                    <div className="sm:col-span-1">
                        <Label>
                            Phone<span className="text-error-500">*</span>
                        </Label>
                        <Input
                            type="text"
                            id="phone"
                            name="phone"
                            placeholder="Enter your phone"
                        />
                    </div>

                </div>

                {/* Submit */}
                <div>
                    <Button className="w-full" size="sm" type="submit" disabled={loading}>
                        {loading ? "Signing in..." : "Sign in"}
                    </Button>
                </div>

                {error && <p className="text-center text-sm text-red-500 mt-2">{error}</p>}
            </div>
        </form>

    );
}
