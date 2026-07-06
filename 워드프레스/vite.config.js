import { defineConfig } from 'vite';
import nunjucks from 'vite-plugin-nunjucks';
import fs from 'fs';
import path from 'path';

// Dynamically discover all HTML files in the root directory
const rootDir = process.cwd();
const htmlFiles = fs.readdirSync(rootDir).filter(file => file.endsWith('.html'));

const input = {};
htmlFiles.forEach(file => {
  // Using file name as key
  const name = path.basename(file, '.html');
  input[name] = path.resolve(rootDir, file);
});

export default defineConfig({
  base: './',
  plugins: [
    nunjucks({
      // 템플릿 전체에서 공통으로 사용할 전역 변수 설정
      variables: {
        'index.html': {
          siteName: '아르떼 (Arte)',
          author: 'Wordncode'
        }
      }
    })
  ],
  build: {
    rollupOptions: {
      input
    }
  }
});
