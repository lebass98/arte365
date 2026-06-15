import { defineConfig } from 'vite';
import nunjucks from 'vite-plugin-nunjucks';

export default defineConfig({
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
  ]
});
