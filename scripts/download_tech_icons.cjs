const fs = require('fs');
const path = require('path');
const https = require('https');

const outDir = path.join(__dirname, '..', 'assets', 'img', 'tech');
if (!fs.existsSync(outDir)) {
    fs.mkdirSync(outDir, { recursive: true });
}

const icons = {
    'php': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg',
    'mysql': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original.svg',
    'typescript': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/typescript/typescript-original.svg',
    'html5': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/html5/html5-original.svg',
    'css3': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/css3/css3-original.svg',
    'javascript': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/javascript/javascript-original.svg',
    'python': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/python/python-original.svg',
    'java': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/java/java-original.svg',
    'git': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/git/git-original.svg',
    'vscode': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/vscode/vscode-original.svg',
    'docker': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/docker/docker-original.svg',
    'apache': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/apache/apache-original.svg'
};

function download(url, dest) {
    return new Promise((resolve, reject) => {
        https.get(url, (res) => {
            if (res.statusCode >= 300 && res.statusCode < 400 && res.headers.location) {
                return download(res.headers.location, dest).then(resolve, reject);
            }
            if (res.statusCode !== 200) {
                return reject(new Error(`Status ${res.statusCode} for ${url}`));
            }
            const fileStream = fs.createWriteStream(dest);
            res.pipe(fileStream);
            fileStream.on('finish', () => {
                fileStream.close();
                resolve();
            });
        }).on('error', reject);
    });
}

async function run() {
    for (const [name, url] of Object.entries(icons)) {
        const dest = path.join(outDir, `${name}.svg`);
        try {
            await download(url, dest);
            console.log(`Downloaded ${name}.svg`);
        } catch (e) {
            console.error(`Failed ${name}: ${e.message}`);
        }
    }
}

run();
