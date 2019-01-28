# 파일들을 분류하는 classifier 모델을 찾고 정확도를 평가

## 1. 환경설정
* IDE : R Studio
* language : R 3.3.0
 
## 2. 시나리오
1. 11개의 다른 카테코리 내 11000개의 웹 페이지 파일들을 읽어와 데이터 추출
2. a, p, script, span 태그를 불러와 각 태그 별 개수 파악
3. 한 파일 내에 각 태그의 개수가 20개 이상이면 1, 아니면 0 으로 분류
4. 각 값이 1인 것들을 training data, 그 외의 것들을 test data
5. Linear regression, logistic regression 을 이용하여 정화도 평가