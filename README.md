# 아르떼 (Arte) 웹 프로젝트

Vite와 Nunjucks 템플릿 엔진을 활용하여 구축된 정적 웹 페이지 프로젝트입니다. 문화예술교육 웹진 '아르떼365(arte365.kr)' 관련 콘텐츠와 소개 페이지 등을 효율적으로 구성하고 컴파일하기 위해 설계되었습니다.

---

## 🛠 기술 스택 (Tech Stack)

- **Build Tool**: [Vite](https://vitejs.dev/) (v5.2.0)
- **Template Engine**: [Nunjucks](https://mozilla.github.io/nunjucks/) (`vite-plugin-nunjucks` 활용)
- **Styling**: Vanilla CSS (자체 디자인 시스템 및 컴포넌트 스타일링)

---

## 📂 프로젝트 구조 (Project Structure)

```text
아르떼/
├── templates/             # Nunjucks 템플릿 폴더
│   ├── layout.html        # 공통 레이아웃 (HTML5 구조, Google Fonts, 공통 스타일)
│   └── partials/          # 공통 컴포넌트 조각
│       ├── header.html    # 공통 헤더
│       └── footer.html    # 공통 푸터
├── index.html             # 메인 페이지 (Nunjucks 헤더/푸터 인클루드)
├── 아르떼소개.html         # 아르떼 소개 페이지
├── 뉴스레터.html           # 뉴스레터 페이지
├── 기사1.html              # 개별 기사 페이지
├── 태그 모음.html           # 태그 모음 페이지
├── sample.html            # 샘플 페이지
├── vite.config.js         # Vite 설정 파일 (Nunjucks 전역 변수 설정 포함)
├── package.json           # 프로젝트 종속성 및 스크립트 정의
└── .gitignore             # Git 제외 파일 설정
```

---

## 🚀 시작하기 (Getting Started)

### 의존성 설치 (Install Dependencies)

프로젝트 실행을 위해 먼저 필요한 패키지들을 설치합니다.

```bash
npm install
```

### 개발 서버 실행 (Run Development Server)

로컬에서 실시간으로 변경 사항을 확인하며 개발할 수 있는 개발 서버를 구동합니다.

```bash
npm run dev
```

### 프로덕션 빌드 (Build for Production)

배포 가능한 정적 파일들로 컴파일하여 `dist` 디렉토리에 빌드합니다.

```bash
npm run build
```

### 로컬 프리뷰 (Preview Production Build)

빌드된 결과물을 로컬 서버에서 미리 확인합니다.

```bash
npm run preview
```

---

## ⚙️ 설정 관련 (Configuration)

### `vite.config.js`
Nunjucks 템플릿 컴파일 시 템플릿 전역에서 사용할 공통 변수(예: `siteName`, `author`)를 정의합니다.
```javascript
plugins: [
  nunjucks({
    variables: {
      'index.html': {
        siteName: '아르떼 (Arte)',
        author: 'Wordncode'
      }
    }
  })
]
```
