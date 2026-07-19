import React, { createContext, useContext, useState, useCallback } from 'react';

const AuthContext = createContext(null);

export function AuthProvider({ children }) {
    const [token, setToken] = useState(() => localStorage.getItem('api_token'));
    const [user, setUser] = useState(() => {
        const stored = localStorage.getItem('api_user');
        return stored ? JSON.parse(stored) : null;
    });

    const login = useCallback((newToken, userData) => {
        localStorage.setItem('api_token', newToken);
        localStorage.setItem('api_user', JSON.stringify(userData));
        setToken(newToken);
        setUser(userData);
    }, []);

    const logout = useCallback(async () => {
        if (token) {
            await fetch('/api/logout', {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${token}`,
                    Accept: 'application/json',
                },
            }).catch(() => {});
        }
        localStorage.removeItem('api_token');
        localStorage.removeItem('api_user');
        setToken(null);
        setUser(null);
    }, [token]);

    return (
        <AuthContext.Provider value={{ token, user, login, logout, isAuthenticated: !!token }}>
            {children}
        </AuthContext.Provider>
    );
}

export function useAuth() {
    const context = useContext(AuthContext);
    if (!context) {
        throw new Error('useAuth debe usarse dentro de AuthProvider');
    }
    return context;
}
