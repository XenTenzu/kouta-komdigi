// api/stats.js
export default function handler(req, res) {
    const stats = {
        totalVictims: 127,
        activeNow: 23,
        dataPoints: 4589,
        todayVictims: 12,
        highValueTargets: 8
    };
    
    res.status(200).json(stats);
}