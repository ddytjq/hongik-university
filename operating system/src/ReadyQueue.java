// jobqueue �� ���� readyqueue ���� ���
public class ReadyQueue{
	public int front; // �Ӹ�
	public int rear; // ����
	private int maxSize; // �ִ������
	public Object[] queueArray; // ť
	public int[] counterrq = null; // ī����
	public int a = 0;
	private Object item;
	private int max[]; //���μ��� ����
	public int index = 0;
	public int process[];

	// ť �迭 ����
	public ReadyQueue(int maxSize, int max[], int process[]){

		this.front = 0; // �Ӹ��� index 0
		this.rear = 0; // ������ index 0
		this.maxSize = maxSize; // maxsize
		this.queueArray = new Object[maxSize]; // ť����
		this.counterrq = new int[process.length]; //
		this.process = process;
		this.max = max; // �ƽ���
	}
	// ť rear�� ������ ���
	public void insert(Object item, int i){

		process[rear] = i;
		queueArray[rear] = item; //5��ť�� ������ ������� �ִ´�.
		rear++;
		if(rear >= maxSize)
			rear--;
	}

	// ť���� front ������ ��ȸ
	public Object peek(){
		return queueArray[front];
	}

	// ť���� front ������ ����
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
