import React from 'react';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/react';
import { Button } from '@/components/ui/button';

interface Props {
    title: string;
    [key: string]: unknown;
}

export default function ComingSoon({ title }: Props) {
    const breadcrumbs: BreadcrumbItem[] = [
        {
            title: 'Dashboard',
            href: '/dashboard',
        },
        {
            title: title,
            href: '#',
        },
    ];

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={title} />
            <div className="flex h-full flex-1 flex-col gap-6 rounded-xl p-6">
                <div className="flex flex-col items-center justify-center min-h-96 bg-white rounded-xl shadow-sm border">
                    <div className="text-center">
                        <div className="mb-4">
                            <div className="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span className="text-4xl">🚧</span>
                            </div>
                        </div>
                        <h1 className="text-2xl font-bold text-gray-900 mb-2">{title}</h1>
                        <p className="text-gray-600 mb-6 max-w-md">
                            Fitur ini sedang dalam tahap pengembangan. Kami sedang bekerja keras untuk 
                            menyediakan pengalaman terbaik untuk Anda.
                        </p>
                        <div className="flex flex-col sm:flex-row gap-3 justify-center">
                            <Link href="/dashboard">
                                <Button>
                                    <span className="mr-2">🏠</span>
                                    Kembali ke Dashboard
                                </Button>
                            </Link>
                            <Link href="/employees">
                                <Button variant="outline">
                                    <span className="mr-2">👥</span>
                                    Kelola Pegawai
                                </Button>
                            </Link>
                        </div>
                    </div>
                </div>

                {/* Progress Indicator */}
                <div className="bg-white rounded-xl p-6 shadow-sm border">
                    <h2 className="text-lg font-semibold text-gray-900 mb-4">🚀 Status Pengembangan</h2>
                    <div className="space-y-4">
                        <div className="flex items-center justify-between">
                            <span className="text-sm text-gray-600">Dashboard & Statistik</span>
                            <span className="text-green-600 font-medium">✓ Selesai</span>
                        </div>
                        <div className="flex items-center justify-between">
                            <span className="text-sm text-gray-600">Data Pegawai</span>
                            <span className="text-green-600 font-medium">✓ Selesai</span>
                        </div>
                        <div className="flex items-center justify-between">
                            <span className="text-sm text-gray-600">Surat Masuk</span>
                            <span className="text-yellow-600 font-medium">🔄 Dalam Proses</span>
                        </div>
                        <div className="flex items-center justify-between">
                            <span className="text-sm text-gray-600">Surat Keluar</span>
                            <span className="text-gray-400 font-medium">⏳ Menunggu</span>
                        </div>
                        <div className="flex items-center justify-between">
                            <span className="text-sm text-gray-600">Sistem Disposisi</span>
                            <span className="text-gray-400 font-medium">⏳ Menunggu</span>
                        </div>
                        <div className="flex items-center justify-between">
                            <span className="text-sm text-gray-600">Laporan & Analytics</span>
                            <span className="text-gray-400 font-medium">⏳ Menunggu</span>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}