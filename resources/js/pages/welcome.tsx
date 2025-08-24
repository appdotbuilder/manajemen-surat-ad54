import React from 'react';
import { Link } from '@inertiajs/react';
import { Button } from '@/components/ui/button';

interface Props {
    auth?: {
        user?: {
            name: string;
            email: string;
        };
    };
    [key: string]: unknown;
}

export default function Welcome({ auth }: Props) {
    return (
        <div className="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
            {/* Header */}
            <header className="bg-white shadow-sm border-b">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex justify-between items-center h-16">
                        <div className="flex items-center space-x-4">
                            <div className="flex items-center space-x-2">
                                <div className="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                                    <span className="text-white font-bold text-lg">📄</span>
                                </div>
                                <span className="text-xl font-bold text-gray-900">SIMASUKE</span>
                            </div>
                        </div>
                        <div className="flex items-center space-x-4">
                            {auth?.user ? (
                                <Link href="/dashboard">
                                    <Button>Dashboard</Button>
                                </Link>
                            ) : (
                                <div className="flex space-x-3">
                                    <Link href="/login">
                                        <Button variant="outline">Masuk</Button>
                                    </Link>
                                    <Link href="/register">
                                        <Button>Daftar</Button>
                                    </Link>
                                </div>
                            )}
                        </div>
                    </div>
                </div>
            </header>

            {/* Hero Section */}
            <main className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div className="text-center">
                    <div className="mb-8">
                        <h1 className="text-4xl font-bold text-gray-900 sm:text-5xl md:text-6xl">
                            📋 Sistem Manajemen Surat
                            <span className="block text-blue-600">Masuk & Keluar</span>
                        </h1>
                        <p className="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                            Platform digital terpadu untuk mengelola surat masuk, surat keluar, dan disposisi 
                            dengan sistem yang terintegrasi dan mudah digunakan.
                        </p>
                    </div>

                    {/* Features Grid */}
                    <div className="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                        <div className="bg-white rounded-xl p-6 shadow-sm border hover:shadow-md transition-shadow">
                            <div className="text-3xl mb-4">📥</div>
                            <h3 className="text-lg font-semibold text-gray-900 mb-2">Surat Masuk</h3>
                            <p className="text-gray-600">Kelola surat masuk dengan sistem registrasi otomatis dan tracking lengkap</p>
                        </div>
                        
                        <div className="bg-white rounded-xl p-6 shadow-sm border hover:shadow-md transition-shadow">
                            <div className="text-3xl mb-4">📤</div>
                            <h3 className="text-lg font-semibold text-gray-900 mb-2">Surat Keluar</h3>
                            <p className="text-gray-600">Buat dan kelola surat keluar dengan penomoran otomatis dan approval workflow</p>
                        </div>
                        
                        <div className="bg-white rounded-xl p-6 shadow-sm border hover:shadow-md transition-shadow">
                            <div className="text-3xl mb-4">🔄</div>
                            <h3 className="text-lg font-semibold text-gray-900 mb-2">Disposisi</h3>
                            <p className="text-gray-600">Sistem disposisi digital dengan tracking timeline dan status real-time</p>
                        </div>
                        
                        <div className="bg-white rounded-xl p-6 shadow-sm border hover:shadow-md transition-shadow">
                            <div className="text-3xl mb-4">👥</div>
                            <h3 className="text-lg font-semibold text-gray-900 mb-2">Data Pegawai</h3>
                            <p className="text-gray-600">Manajemen data pegawai, jabatan, dan struktur organisasi yang lengkap</p>
                        </div>
                        
                        <div className="bg-white rounded-xl p-6 shadow-sm border hover:shadow-md transition-shadow">
                            <div className="text-3xl mb-4">📊</div>
                            <h3 className="text-lg font-semibold text-gray-900 mb-2">Dashboard & Laporan</h3>
                            <p className="text-gray-600">Dashboard eksekutif dengan analytics dan laporan komprehensif</p>
                        </div>
                        
                        <div className="bg-white rounded-xl p-6 shadow-sm border hover:shadow-md transition-shadow">
                            <div className="text-3xl mb-4">🗃️</div>
                            <h3 className="text-lg font-semibold text-gray-900 mb-2">E-Filing</h3>
                            <p className="text-gray-600">Sistem pengarsipan digital dengan pencarian canggih dan backup otomatis</p>
                        </div>
                    </div>

                    {/* Key Benefits */}
                    <div className="mt-16 bg-white rounded-2xl p-8 shadow-sm border">
                        <h2 className="text-2xl font-bold text-gray-900 mb-8">🚀 Mengapa Pilih SIMASUKE?</h2>
                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div className="flex items-start space-x-3">
                                <div className="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center">
                                    <span className="text-green-600 text-sm">✓</span>
                                </div>
                                <div>
                                    <h4 className="font-medium text-gray-900">Penomoran Otomatis</h4>
                                    <p className="text-gray-600 text-sm">Sistem penomoran surat yang konsisten dan terorganisir</p>
                                </div>
                            </div>
                            
                            <div className="flex items-start space-x-3">
                                <div className="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center">
                                    <span className="text-green-600 text-sm">✓</span>
                                </div>
                                <div>
                                    <h4 className="font-medium text-gray-900">Timeline Disposisi</h4>
                                    <p className="text-gray-600 text-sm">Tracking perjalanan surat dengan detail timeline</p>
                                </div>
                            </div>
                            
                            <div className="flex items-start space-x-3">
                                <div className="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center">
                                    <span className="text-green-600 text-sm">✓</span>
                                </div>
                                <div>
                                    <h4 className="font-medium text-gray-900">Export Excel</h4>
                                    <p className="text-gray-600 text-sm">Ekspor data surat berdasarkan kategori dan periode</p>
                                </div>
                            </div>
                            
                            <div className="flex items-start space-x-3">
                                <div className="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center">
                                    <span className="text-green-600 text-sm">✓</span>
                                </div>
                                <div>
                                    <h4 className="font-medium text-gray-900">Notifikasi Real-time</h4>
                                    <p className="text-gray-600 text-sm">Notifikasi email dan WhatsApp untuk update penting</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {/* CTA Section */}
                    {!auth?.user && (
                        <div className="mt-16">
                            <div className="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl p-8 text-white">
                                <h2 className="text-2xl font-bold mb-4">Siap Memulai?</h2>
                                <p className="text-blue-100 mb-6">
                                    Bergabunglah dengan instansi lain yang telah menggunakan SIMASUKE untuk 
                                    mengelola surat dan disposisi dengan lebih efisien.
                                </p>
                                <div className="flex flex-col sm:flex-row gap-4 justify-center">
                                    <Link href="/register">
                                        <Button size="lg" variant="secondary" className="w-full sm:w-auto">
                                            🚀 Daftar Sekarang
                                        </Button>
                                    </Link>
                                    <Link href="/login">
                                        <Button size="lg" variant="outline" className="w-full sm:w-auto text-white border-white hover:bg-white hover:text-blue-600">
                                            Masuk ke Akun
                                        </Button>
                                    </Link>
                                </div>
                            </div>
                        </div>
                    )}
                </div>
            </main>

            {/* Footer */}
            <footer className="bg-white border-t mt-20">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    <div className="text-center">
                        <p className="text-gray-500">
                            © 2024 SIMASUKE. Sistem Manajemen Surat Masuk & Keluar.
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    );
}