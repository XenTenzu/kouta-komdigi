// api/victims.js (Vercel Serverless Function)
const victims = [
    {
        id: 'victim1',
        name: 'Budi Santoso',
        phone: '081234567890',
        location: 'Jakarta, ID',
        online: true,
        lastSeen: '5m ago',
        device: 'Samsung Galaxy S23 Ultra',
        browser: 'Chrome 120.0.6099.130',
        ip: '192.168.1.100'
    },
    // ... tambah data korban lainnya
];

export default function handler(req, res) {
    res.status(200).json(victims);
}