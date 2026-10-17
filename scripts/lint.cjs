const { execSync } = require('child_process');
const fs = require('fs');
const path = require('path');

const rootDir = path.resolve(__dirname, '..');

function findPhpFiles(dir) {
  let results = [];
  const list = fs.readdirSync(dir, { withFileTypes: true });
  for (const entry of list) {
    if (entry.name.startsWith('.') || entry.name === 'node_modules' || entry.name === 'vendor') {
      continue;
    }
    const fullPath = path.join(dir, entry.name);
    if (entry.isDirectory()) {
      results = results.concat(findPhpFiles(fullPath));
    } else if (entry.name.endsWith('.php')) {
      results.push(fullPath);
    }
  }
  return results;
}

const files = findPhpFiles(rootDir);
console.log(`Found ${files.length} PHP file(s) to verify:`);

let hasError = false;
let phpAvailable = true;

try {
  execSync('php -v', { stdio: 'ignore' });
} catch {
  phpAvailable = false;
  console.warn('Notice: PHP CLI is not available in this environment. Skipping syntax checks.');
}

if (phpAvailable) {
  for (const file of files) {
    const relative = path.relative(rootDir, file).replace(/\\/g, '/');
    try {
      const output = execSync(`php -l "${file}"`, { encoding: 'utf8' }).trim();
      console.log(`  [OK] ${relative}: ${output}`);
    } catch (err) {
      console.error(`  [FAIL] ${relative}:\n${err.stdout || err.message}`);
      hasError = true;
    }
  }

  if (hasError) {
    console.error('\nSyntax check failed on one or more files.');
    process.exit(1);
  } else {
    console.log('\nAll PHP files passed syntax checks successfully.');
  }
}
