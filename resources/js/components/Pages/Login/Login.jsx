import React, { useState } from 'react';
import { useAuth } from '../../../contexts/AuthContext';

export default function Login() {
    const { login } = useAuth();
    const [form, setForm] = useState({ email: '', password: '' });
    const [error, setError] = useState(null);
    const [loading, setLoading] = useState(false);

    function handleChange(e) {
        const { name, value } = e.target;
        setForm(prev => ({ ...prev, [name]: value }));
    }

    async function handleSubmit(e) {
        e.preventDefault();
        setError(null);
        setLoading(true);

        try {
            const response = await fetch('/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    Accept: 'application/json',
                },
                body: JSON.stringify(form),
            });

            const data = await response.json();

            if (!response.ok) {
                const message = data.errors?.email?.[0] ?? data.message ?? 'Credenciales incorrectas.';
                setError(message);
                return;
            }

            login(data.token, data.user);
        } catch {
            setError('Error de conexión. Intenta de nuevo.');
        } finally {
            setLoading(false);
        }
    }

    return (
        <div className="d-flex justify-content-center align-items-center vh-100 bg-light">
            <div className="card shadow" style={{ width: '380px' }}>
                <div className="card-body p-4">
                    <h4 className="card-title mb-4 text-center">Iniciar sesión</h4>

                    {error && (
                        <div className="alert alert-danger py-2">{error}</div>
                    )}

                    <form onSubmit={handleSubmit}>
                        <div className="mb-3">
                            <label className="form-label">Correo electrónico</label>
                            <input
                                type="email"
                                className="form-control"
                                name="email"
                                value={form.email}
                                onChange={handleChange}
                                required
                                autoFocus
                            />
                        </div>
                        <div className="mb-3">
                            <label className="form-label">Contraseña</label>
                            <input
                                type="password"
                                className="form-control"
                                name="password"
                                value={form.password}
                                onChange={handleChange}
                                required
                            />
                        </div>
                        <button
                            type="submit"
                            className="btn btn-primary w-100"
                            disabled={loading}
                        >
                            {loading ? 'Entrando...' : 'Entrar'}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    );
}
