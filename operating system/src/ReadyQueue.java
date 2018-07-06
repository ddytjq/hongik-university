// jobqueue 를 지나 readyqueue 에서 대기
public class ReadyQueue{
	public int front; // 머리
	public int rear; // 꼬리
	private int maxSize; // 최대사이즈
	public Object[] queueArray; // 큐
	public int[] counterrq = null; // 카운터
	public int a = 0;
	private Object item;
	private int max[]; //프로세스 개수
	public int index = 0;
	public int process[];

	// 큐 배열 생성
	public ReadyQueue(int maxSize, int max[], int process[]){

		this.front = 0; // 머리는 index 0
		this.rear = 0; // 꼬리는 index 0
		this.maxSize = maxSize; // maxsize
		this.queueArray = new Object[maxSize]; // 큐생성
		this.counterrq = new int[process.length]; //
		this.process = process;
		this.max = max; // 맥스값
	}
	// 큐 rear에 데이터 등록
	public void insert(Object item, int i){

		process[rear] = i;
		queueArray[rear] = item; //5개큐에 아이탬 순서대로 넣는다.
		rear++;
		if(rear >= maxSize)
			rear--;
	}

	// 큐에서 front 데이터 조회
	public Object peek(){
		return queueArray[front];
	}

	// 큐에서 front 데이터 제거
	public Object remove(){
		this.item = peek();
		move();
		return item;
	}
	
	public Object index(){
		return process[front];
	}
	
	public void move(){
		for(int i = front+1; i <=rear; i++){
			queueArray[i-1] = queueArray[i];
			process[i-1] = process[i];
		}
	}

	/////////////////////////////////////////////////////////
	public void counterrq(){
		for(int z = front; z <= rear-1; z++){
			counterrq[process[z]] += (int) item;
			}
		}
	}
	/////////////////////////////////////////////////////////
