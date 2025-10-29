import api from "./api";

interface LoginRequest {
    email: string;
    password: string;
}

interface User {
    id: number;
    name: string;
    email: string;
    username: string;
    phone: string;
    role_name: string;
    role_id: number;
    my_name: string | null;
    created_at: string;
    updated_at: string;
}

interface LoginResponse {
    status: boolean;
    message: string;
    access_token: string;
    token_type: string;
    user: User;
}

export const login = async (credentials: LoginRequest): Promise<LoginResponse> => {
    try {
        const response = await api.post<LoginResponse>("/login", credentials);
        return response.data;
    } catch (error: any) {
        throw new Error(error.response?.data?.message || "Login failed");
    }
};
