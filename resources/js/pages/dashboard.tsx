import React from 'react';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/react';
import { Button } from '@/components/ui/button';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

interface Props {
    stats?: {
        incoming_letters: number;
        outgoing_letters: number;
        dispositions: number;
        employees: number;
    };
    [key: string]: unknown;
}

export default function Dashboard({ stats }: Props) {
    const defaultStats = {
        incoming_letters: 0,
        outgoing_letters: 0,
        dispositions: 0,
        employees: 0,
        ...stats
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />
            <div className="flex h-full flex-1 flex-col gap-6 rounded-xl p-6">
                {/* Welcome Header */}
                <div className="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl p-6 text-white">
                    <h1 className="text-2xl font-bold mb-2">📋 Selamat Datang di SIMASUKE</h1>
                    <p className="text-blue-100">Sistem Manajemen Surat Masuk & Keluar - Dashboard Utama</p>
                </div>

                {/* Stats Cards */}
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div className="bg-white rounded-xl p-6 shadow-sm border hover:shadow-md transition-shadow">
                        <div className="flex items-center justify-between">
                            <div>
                                <p className="text-sm font-medium text-gray-600">Surat Masuk</p>
                                <p className="text-3xl font-bold text-gray-900">{defaultStats.incoming_letters}</p>
                            </div>
                            <div className="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <span className="text-2xl">📥</span>
                            </div>
                        </div>
                        <div className="mt-4">
                            <Link href="/incoming-letters">
                                <Button size="sm" variant="outline" className="w-full">Lihat Detail</Button>
                            </Link>
                        </div>
                    </div>

                    <div className="bg-white rounded-xl p-6 shadow-sm border hover:shadow-md transition-shadow">
                        <div className="flex items-center justify-between">
                            <div>
                                <p className="text-sm font-medium text-gray-600">Surat Keluar</p>
                                <p className="text-3xl font-bold text-gray-900">{defaultStats.outgoing_letters}</p>
                            </div>
                            <div className="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <span className="text-2xl">📤</span>
                            </div>
                        </div>
                        <div className="mt-4">
                            <Link href="/outgoing-letters">
                                <Button size="sm" variant="outline" className="w-full">Lihat Detail</Button>
                            </Link>
                        </div>
                    </div>

                    <div className="bg-white rounded-xl p-6 shadow-sm border hover:shadow-md transition-shadow">
                        <div className="flex items-center justify-between">
                            <div>
                                <p className="text-sm font-medium text-gray-600">Disposisi</p>
                                <p className="text-3xl font-bold text-gray-900">{defaultStats.dispositions}</p>
                            </div>
                            <div className="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                                <span className="text-2xl">🔄</span>
                            </div>
                        </div>
                        <div className="mt-4">
                            <Link href="/dispositions">
                                <Button size="sm" variant="outline" className="w-full">Lihat Detail</Button>
                            </Link>
                        </div>
                    </div>

                    <div className="bg-white rounded-xl p-6 shadow-sm border hover:shadow-md transition-shadow">
                        <div className="flex items-center justify-between">
                            <div>
                                <p className="text-sm font-medium text-gray-600">Pegawai</p>
                                <p className="text-3xl font-bold text-gray-900">{defaultStats.employees}</p>
                            </div>
                            <div className="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <span className="text-2xl">👥</span>
                            </div>
                        </div>
                        <div className="mt-4">
                            <Link href="/employees">
                                <Button size="sm" variant="outline" className="w-full">Lihat Detail</Button>
                            </Link>
                        </div>
                    </div>
                </div>

                {/* Quick Actions */}
                <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div className="bg-white rounded-xl p-6 shadow-sm border">
                        <h2 className="text-lg font-semibold text-gray-900 mb-4">🚀 Aksi Cepat</h2>
                        <div className="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <Link href="/incoming-letters/create">
                                <Button variant="outline" className="w-full justify-start">
                                    <span className="mr-2">📝</span>
                                    Tambah Surat Masuk
                                </Button>
                            </Link>
                            <Link href="/outgoing-letters/create">
                                <Button variant="outline" className="w-full justify-start">
                                    <span className="mr-2">✍️</span>
                                    Buat Surat Keluar
                                </Button>
                            </Link>
                            <Link href="/dispositions/create">
                                <Button variant="outline" className="w-full justify-start">
                                    <span className="mr-2">🔄</span>
                                    Buat Disposisi
                                </Button>
                            </Link>
                            <Link href="/employees/create">
                                <Button variant="outline" className="w-full justify-start">
                                    <span className="mr-2">👤</span>
                                    Tambah Pegawai
                                </Button>
                            </Link>
                        </div>
                    </div>

                    <div className="bg-white rounded-xl p-6 shadow-sm border">
                        <h2 className="text-lg font-semibold text-gray-900 mb-4">📊 Laporan & Analytics</h2>
                        <div className="space-y-3">
                            <Link href="/reports/monthly">
                                <Button variant="outline" className="w-full justify-start">
                                    <span className="mr-2">📈</span>
                                    Laporan Bulanan
                                </Button>
                            </Link>
                            <Link href="/reports/disposition-timeline">
                                <Button variant="outline" className="w-full justify-start">
                                    <span className="mr-2">⏱️</span>
                                    Timeline Disposisi
                                </Button>
                            </Link>
                            <Link href="/reports/export">
                                <Button variant="outline" className="w-full justify-start">
                                    <span className="mr-2">📋</span>
                                    Export Excel
                                </Button>
                            </Link>
                        </div>
                    </div>
                </div>

                {/* Recent Activity */}
                <div className="bg-white rounded-xl p-6 shadow-sm border">
                    <h2 className="text-lg font-semibold text-gray-900 mb-4">📋 Aktivitas Terbaru</h2>
                    <div className="space-y-4">
                        <div className="flex items-start space-x-3 p-3 bg-gray-50 rounded-lg">
                            <div className="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <span className="text-sm">📥</span>
                            </div>
                            <div className="flex-1">
                                <p className="text-sm font-medium text-gray-900">
                                    Surat masuk baru perlu ditinjau
                                </p>
                                <p className="text-xs text-gray-500">2 jam yang lalu</p>
                            </div>
                        </div>

                        <div className="flex items-start space-x-3 p-3 bg-gray-50 rounded-lg">
                            <div className="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <span className="text-sm">📤</span>
                            </div>
                            <div className="flex-1">
                                <p className="text-sm font-medium text-gray-900">
                                    Surat keluar berhasil dikirim
                                </p>
                                <p className="text-xs text-gray-500">5 jam yang lalu</p>
                            </div>
                        </div>

                        <div className="flex items-start space-x-3 p-3 bg-gray-50 rounded-lg">
                            <div className="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <span className="text-sm">🔄</span>
                            </div>
                            <div className="flex-1">
                                <p className="text-sm font-medium text-gray-900">
                                    Disposisi baru diterima
                                </p>
                                <p className="text-xs text-gray-500">1 hari yang lalu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}