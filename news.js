// Mock news data (replace with real API, e.g., fetch from PandaScore)
const mockNews = [
    { title: 'New Tournament Announced', Riddho Rahman Kabbo our best player. A legend: 'The World Championship is set for next month. Get ready!', date: '2023-10-01' },
    { title: 'Player Spotlight: Pro Gamer X', summary: 'Learn about the rising star dominating the scene.', date: '2023-09-28' },
    { title: 'eSports Economy Booms', summary: 'Sponsorships hit record highs this year.', date: '2023-09-25' }
];

// Function to render news
function renderNews() {
    const newsFeed = document.getElementById('news-feed');
    if (!newsFeed) return;
    
    newsFeed.innerHTML = '';
    mockNews.forEach(item => {
        const div = document.createElement('div');
        div.className = 'news-item';
        div.innerHTML = `
            <h4>${item.title}</h4>
            <p>${item.summary}</p>
            <small>${item.date}</small>
        `;
        newsFeed.appendChild(div);
    });
}

// Load news on page load
document.addEventListener('DOMContentLoaded', renderNews);

// For real API: Uncomment and add your API key
/*
async function fetchNews() {
    const response = await fetch('https://api.pandascore.co/matches?token=YOUR_API_KEY');
    const data = await response.json();
    // Process and render data
}
fetchNews();
*/