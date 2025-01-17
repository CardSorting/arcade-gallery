const fs = require('fs');
const path = require('path');

// Check for index.html at root
const rootFiles = fs.readdirSync(process.cwd());
if (!rootFiles.includes('index.html')) {
  console.error('Error: Missing index.html at root directory');
  process.exit(1);
}

// Validate file types
const allowedExtensions = ['.html', '.js', '.css'];
const invalidFiles = [];

function checkDirectory(dir) {
  const files = fs.readdirSync(dir);
  
  files.forEach(file => {
    const fullPath = path.join(dir, file);
    const stat = fs.statSync(fullPath);
    
    if (stat.isDirectory()) {
      checkDirectory(fullPath);
    } else {
      const ext = path.extname(file).toLowerCase();
      if (!allowedExtensions.includes(ext)) {
        invalidFiles.push(fullPath);
      }
    }
  });
}

checkDirectory(process.cwd());

if (invalidFiles.length > 0) {
  console.error('Error: Found files with invalid extensions:');
  invalidFiles.forEach(file => console.error(`- ${file}`));
  process.exit(1);
}

console.log('Submission validated successfully');
process.exit(0);
