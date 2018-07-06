###################################################start####################################################
# data reset, library 

rm(list=ls())
library("data.table")

############################################################################################################
# 경로지정, 경로에 파일 불러오기, 개수 999999999개로 늘리고 불러오기

options(max.print=999999999)
directory<-c("C:/Users/yosub/Documents/StatewithR/Project/data")
read_file<-list.files(directory)
read_file
str(read_file)
read_file_leng<-length(read_file)
read_file_leng

############################################################################################################
# 11000개 text 앞 6개 불러오기 및 frame ( read_file_leng = txt 개수 길이 )

for(i in 1:read_file_leng){
  dataset<-read.table(
    paste(directory, "/", read_file[i], sep=""), sep="=", header=FALSE, nrows=6, fill=T)
  dataset<-dataset[,c(1:2)]
  dataset_mid = as.data.frame(t(dataset))
  names(dataset_mid)<-c("ID", "URL", "SIZE", "DATA", "TIME", "DATASET")
  rownames(dataset_mid)<-NULL
  dataset_mid<-dataset_mid[c(2),]
  if(i==1)
    dataset_result<-dataset_mid
  else
    dataset_result<-rbind(dataset_mid, dataset_result)
  
  rm(dataset_mid)
  rm(dataset)
}

# 11000개 data.csv에 저장 
write.csv(dataset_result, "C:/Users/yosub/Documents/StatewithR/Project/result/data.csv")

############################################################################################################
# url읽어오고 데이터 추출하기 ( 공백 데이터 삭제 및 추출 )

library("rvest")

# init -> a, p, script, span 태그 불러오기
i=1 
html = read_html(paste0(directory, "/", read_file[i], sep=""), encoding="UTF-8")
cast <- html_nodes(html, "a") %>%  html_text()
cast2 <- html_nodes(html,"p") %>% html_text()
cast3 <- html_nodes(html,"script") %>% html_text()
cast4 <- html_nodes(html,"span") %>% html_text()

# create table
table <- data.frame(matrix(nrow=1, ncol=4))
#4개의 열과 1개의 행을 하나만들고 이름설정
names(table) = c('a','p','script','span')
cast = data.frame(length(cast),length(cast2),length(cast3),length(cast4))

# 분류 ( 한 파일내에 태그개수가 20개 이상이면은 true, 아니면 false )
for(j in 1:4){
  if(cast[,j]>=20){
    table[j][1] =1
  }else
    table[j][1] =0
}

# read to html tag
for(i in 2:read_file_leng){
  cast <- html_nodes(html, "a") %>%  html_text()
  cast2 <- html_nodes(html,"p") %>% html_text()
  cast3 <- html_nodes(html,"script") %>% html_text()
  cast4 <- html_nodes(html,"span") %>% html_text()
  
  # create table
  temp <- data.frame(matrix(nrow=1, ncol=4))
  # 4개의 열과 1개의 행을 하나만들고 이름설정, 
  names(temp) = c('a','p','script','span')
  cast = data.frame(length(cast),length(cast2),length(cast3),length(cast4))
  
  # 분류 ( 한 파일내에 태그개수가 15개 이상이면은 true, 아니면 false )
  for(j in 1:4){
    if(cast[,j]>=15){
      temp[j][1] =1
    }else
      temp[j][1] =0
  }
  
  # rbind
  table = rbind(table,temp)
}

train = (table$a == 1) #table a에 모든 것을 트레이닝한다.
test = (!train) #그 외의 것을 테스트로 설정

#linear regression
lm.fit=lm(a~p+span+script, data=table, subset=train)
lm.fit

#logistic regression
glm.fit=glm(as.factor(a)~p+span+script, data=table ,family=binomial) 
summary(glm.fit)

####################################END######################################################